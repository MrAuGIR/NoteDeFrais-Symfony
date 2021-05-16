import axios from "axios";
import { TYPE_VEHICLE_API } from "../config";
import cache from "../services/cacheAPI"

async function findAll(){

    const cacheVehicleType = cache.get("vehicleTypes");

    //if(cacheVehicleType) return cacheVehicleType;

    return axios.get("http://localhost:8000/api/type_vehicles").then( response => {
        const types = response.data['hydra:member'];
        console.log(types);
        //on met a jour le cache
        cache.set("vehicleTypes", types);
        return types;
    })

}
export default{
    findAll: findAll
}