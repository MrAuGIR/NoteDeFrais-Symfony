import React, { useEffect, useState } from 'react';
import { toast } from 'react-toastify';
import CategoriesAPI from '../API/CategoriesAPI';
import horsePowerAPI from "../API/HorsePowerAPi";
import scaleAPI from '../API/scaleAPI';
import vehicleType from '../API/VehicleTypeAPI';

const CategoriesPage = (props) => {

    const [categories, setCategories] = useState([]);
    const [typeVehicles, setTypeVehicles] = useState([])
    const [horsePowers, setHorsePowers] = useState([]);
    const [scales, setScales] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [loading, setLoading] = useState(true);

    //fetch categorie 
    const fetchCategories = async () => {
        try{
            const data = await CategoriesAPI.findAll();
            setCategories(data);
            setLoading(false);

        }catch(error){
            console.log(error);
            toast.error("Erreur lors de la récupération des categories fiscales")
        }

    }
    //On recupère les puissances fiscale
    const fetchHorsePower = async () => {
        try{
            const data = await horsePowerAPI.findAll();
            setHorsePowers(data);
            setLoading(false);

        }catch(error){
            console.log(error);
            toast.error("Erreur lors de la récupération des puissances fiscale")
        }
    }
    
    //On recupère les coefficient
    const fetchScale = async () => {
        try{
            const data = await scaleAPI.findAll();
            setScales(data);
            setLoading(false)
        }catch(error){
            console.log(error);
            toast.error("Erreur lors de la recupération des coefficiants kilometriques");
        }

    }

    //on recupère les type de vehicule
    const fetchType = async () => {
        try{
            const data = await vehicleType.findAll();
            setTypeVehicles(data);
            setLoading(false)
        }catch(error){
            console.log(error);
            toast.error("Erreur lors de la recupération des types de vehicule");
        }
    }

    //Au chargement du composant on recupère les puissances fiscale
    useEffect(() => {
        fetchHorsePower();
        fetchScale();
        fetchType();
        fetchCategories();
    }, [])

    //gestion du changement de page
    const handlePageChange = (page) => setCurrentPage(page);


    

    return ( 

        <>
            <div className="row">
                <div className="col-12">
                    <h2>Catégorie de véhicule possible</h2>
                </div>
                <div className="col-12">
                    <table className="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type de vehicule</th>
                                <th scope="col">puissance fiscale</th>
                                <th scope="col">coefficiants</th>
                                <th scope="col">Kilometrque range</th>
                            </tr>
                        </thead>
                        <tbody>
                            {categories.map(category => 
                                <tr key={category.id}>
                                    <td>{category.id}</td>
                                    <td>{category.typeVehicle.label}</td>
                                    <td>{category.taxHorsePower.label}</td>
                                    <td>{category.scales.map(scale => <li key={scale.id}>{scale.coef}</li>)}</td>
                                    <td>{category.scales.map(scale => 
                                        <li key={scale.kilometricRange.id}>{scale.kilometricRange.min} - {scale.kilometricRange.max}</li>)}
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
            <div className="row">
                <div className="col-12 col-md-4">
                    <div className="row">
                        <div className="col-12">
                            <h2>Type de vehicules</h2>
                        </div>
                        <div className="col-12">
                            <table className="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Label</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {typeVehicles.map(type => 
                                        <tr key={type.id}>
                                            <td>{type.id}</td>
                                            <td>{type.label}</td>
                                            <td>

                                            </td>
                                        </tr>    
                                    )}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div className="col-12 col-md-4">
                    <div className="row">
                        <div className="col-12">
                            <h2>Coefficient</h2>
                        </div>
                        <div className="col-12">
                            <table className="table table-striped">
                                <thead>
                                    <tr>
                                        <th>range</th>
                                        <th>category</th>
                                        <th>coef</th>
                                        <th>offset</th>
                                        <th>description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {scales.map(scale => 
                                        <tr key={scale.id}>
                                            <td>{scale.kilometricRange.min} - {scale.kilometricRange.max} </td>
                                            <td>{scale.category.typeVehicle.label}</td>
                                            <td>{scale.category.taxHorsePower.label}</td>
                                            <td>{scale.coef}</td>
                                            <td>{scale.offset}</td>
                                            <td>

                                            </td>
                                        </tr>    
                                    )}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div className="col-12 col-md-4">
                    <div className="row">
                        <div className="col-12">
                            <h2>Puissance fiscale des vehicules</h2>
                        </div>
                        <div className="col-12">
                            <table className="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Label</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {horsePowers.map(horse => 
                                        <tr key={horse.id}>
                                            <td>{horse.id}</td>
                                            <td>{horse.label}</td>
                                            <td>

                                            </td>
                                        </tr>    
                                    )}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            

        </>


     );
}
 
export default CategoriesPage;