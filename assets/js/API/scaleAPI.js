import axios from "axios";
import { SCALE_API } from "../config";
import cache from "../services/cacheAPI"

async function findAll(){
    //on verifie le cache pour voir la clé horsePoser existe déjà dans le tableau
    const cacheScales = await cache.get("scales");

    if(cacheScales) return cacheScales;

    return axios.get(SCALE_API).then(response => {
        const scales = response.data['hydra:member'];
        console.log(scales);
        //on met a jour le cache
        cache.set("scales", scales);
        return scales;
    })
}

export default{
    findAll: findAll
}
