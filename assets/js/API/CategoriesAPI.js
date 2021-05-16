import axios from "axios"
import { CATEGORiES_API } from "../config";
import cache from "../services/cacheAPI"


async function findAll(){
    //on verifie le cache pour voir la clé horsePoser existe déjà dans le tableau
    const cacheCategories = await cache.get("categories");

    if(cacheCategories) return cacheCategories;

    return axios.get(CATEGORiES_API).then(response => {
        const categories = response.data['hydra:member'];
        console.log(categories);
        //on met a jour le cache
        cache.set("categories", categories);
        return categories;
    })
}

export default{
    findAll: findAll
}