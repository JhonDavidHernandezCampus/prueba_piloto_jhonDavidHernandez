
export default{

    async gettablas(metodo,tabla){
            let datos = await(await fetch(`http://localhost/prueba_piloto_jhonDavidHernandez/backend/api/${tabla}/${metodo}`)).json();
            //console.log(datos);
            return datos;
    }
}

