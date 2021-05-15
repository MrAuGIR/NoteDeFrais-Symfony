<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Vehicle;
use App\Entity\Category;
use App\Entity\Expense;
use App\Entity\TypeVehicle;
use App\Entity\ExpenseReport;
use App\Entity\ExpenseType;
use App\Entity\TaxHorsePower;
use App\Entity\Tva;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');
        $tabExp = [];

        //creation de l'admin
        $user = (new User())->setEmail('admin@ndf.com')->setPassword(password_hash('admin', PASSWORD_BCRYPT));
        $manager->persist($user);

        //creation des tva et des depenses
        $tva = (new Tva())->setActive(true)->setCode('5.5')->setTaux(5.5);
        $manager->persist($tva);
        $tva2 = (new Tva())->setActive(true)->setCode('10.0')->setTaux(10.0);
        $manager->persist($tva2);
        $tva3 = (new Tva())->setActive(true)->setCode('20.0')->setTaux(20.0);
        $manager->persist($tva3);
        $tva4 = (new Tva())->setActive(true)->setCode(0)->setTaux(0.0);
        $manager->persist($tva4);

        //creation des types de depense
        $typeExp1 = (new ExpenseType())->setCode('EX_FLI')->setLabel('Avion')->setTva($tva)->setActive(true);
        $tabExp[] = $typeExp1;
        $manager->persist($typeExp1);
        $typeExp2 = (new ExpenseType())->setCode('EX_RES')->setLabel('Restaurant')->setTva($tva2)->setActive(true);
        $tabExp[] = $typeExp2;
        $manager->persist($typeExp2);
        $typeExp3 = (new ExpenseType())->setCode('EX_FUEL')->setLabel('essence')->setTva($tva3)->setActive(true);
        $tabExp[] = $typeExp3;
        $manager->persist($typeExp3);
        $typeExp4 = (new ExpenseType())->setCode('EX_KM')->setLabel('Frais kilometrique')->setTva($tva4)->setActive(true);
        $tabExp[] = $typeExp4;
        $manager->persist($typeExp4);

        //creation des types de vehicules
        $tabType=[];
        $typeVehicule = (new TypeVehicle())->setCode('VOT')->setLabel('Voiture thermique')->setActive(true);
        $tabType[]=$typeVehicule;
        $manager->persist($typeVehicule);
        $typeVehicule = (new TypeVehicle())->setCode('MOT')->setLabel('Moto thermique')->setActive(true);
        $tabType[] = $typeVehicule;
        $manager->persist($typeVehicule);

        //creation des cheveaux fiscaux
        $tabHorse = [];
        for($h = 3 ; $h < 9; $h++){
            $horsePower = (new TaxHorsePower())->setCode("$h.cv")->setLabel("$h. CV")->setActive(true);
            $tabHorse[] = $horsePower;
            $manager->persist($horsePower);
        }

        //creation de la category du vehicule
        $tabCat = [];
        for($ca = 0; $ca < 6; $ca++){
            $random = mt_rand(0,5);
            $random2 = mt_rand(0,1);
            $category = (new Category())->setTaxHorsePower($tabHorse[$random])->setTypeVehicle($tabType[$random2]);
            $tabCat[] = $category;
            $manager->persist($category);
        }
        

        // creation des utilisateur
        for($u = 0; $u<20; $u++){
            $user = (new User())->setEmail($faker->email)->setPassword($this->encoder->encodePassword($user,'password'));
            $manager->persist($user);

            //creation des vehicule pour chaque utilisateur
            for($v=0; $v<mt_rand(0,2); $v++){
                $random = mt_rand(0,5);
                $vehicule = (new Vehicle())->setUser($user)
                    ->setCategory($tabCat[$random])
                    ->setImma($faker->text(9));
                $manager->persist($vehicule);
            }

            //les notes de frais de chaque utilisateur
            for($er =0 ; $er<mt_rand(0,10); $er++){
                $expenseReport = (new ExpenseReport())
                    ->setAuthor($user)
                    ->setCreatedAt(new \DateTime())
                    ->setDescription('un premiere note de frais')
                    ->setReference('prov')
                    ->setStartedAt(new \DateTime())
                    ->setStatus(0);
                $manager->persist($expenseReport);

                //les lignes de dépenses pour chaque note de frais
                for($e = 0; $e < mt_rand(0,6); $e++){
                    $random = mt_rand(0,3);

                    $expense = (new Expense())->setCreatedAt(new \DateTime())
                        ->setCurIso('EURO')
                        ->setDescription($faker->paragraph(4))
                        ->setExpenseReport($expenseReport)
                        ->setExpenseType($tabExp[$random])
                        ->setQuantity(mt_rand(1,5))
                        ->setTotalHt($faker->numberBetween(0,5000))
                        ->setDoneAt($faker->dateTimeBetween('-1 years'));
                    $manager->persist($expense);
                }
            }

            

        }

        $manager->flush();
        
    }
}
