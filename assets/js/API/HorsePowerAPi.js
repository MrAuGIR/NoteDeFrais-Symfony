import axios from 'axios';
import { HORSE_POWER_API } from '../config';
import cache from "../services/cacheAPI"

async function findAll()
{
    //on verifie le cache pour voir la clé horsePoser existe déjà dans le tableau
    const cacheHorsePower = await cache.get("horsePowers");

    if(cacheHorsePower) return cacheHorsePower;

    return axios.get(HORSE_POWER_API).then(response => {
        const horsePowers = response.data['hydra:member'];
        console.log(horsePowers);
        //on met a jour le cache
        cache.set("horsePowers", horsePowers);
        return horsePowers;
    })
}

export default {
    findAll: findAll
}