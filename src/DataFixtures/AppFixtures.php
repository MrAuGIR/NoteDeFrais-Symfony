<?php

namespace App\DataFixtures;

use App\Entity\Expense;
use App\Entity\User;
use App\Entity\Vehicle;
use App\Entity\VehicleCategory;
use App\Entity\GroupVehicleCat;
use App\Entity\ExpenseReport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        
        $user = (new User())->setEmail('admin@ndf.com')->setPassword(password_hash('admin',PASSWORD_BCRYPT));
        $group = (new GroupVehicleCat())->setLabel('Voiture')->setActive(true);
        $categoryVehicle = (new VehicleCategory())->setLabel('3CV')->setGroupVehicle($group)->setActive(true);
        $vehicle = (new Vehicle())->setCategory($categoryVehicle)->setImma('SR-732-BT')->setUser($user);

        $manager->persist($group);
        $manager->persist($categoryVehicle);
        $manager->persist($vehicle);
        $manager->persist($user);

        $expenseReport = (new ExpenseReport())
            ->setAuthor($user)
            ->setCreatedAt(new \DateTime())
            ->setDescription('un premiere note de frais')
            ->setReference('prov')
            ->setStartedAt(new \DateTime())
            ->setStatus(0)
            ->setSupervisor($user);
            
        $manager->persist($expenseReport);

        $manager->flush();
    }
}
