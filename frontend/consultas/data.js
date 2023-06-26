import tablacountries from "./tablacountries.js";

function datos(){
let form = document.querySelector('.accions');
    form.addEventListener('submit', async (e)=>{
        e.preventDefault();
        let dataformulario = Object.fromEntries(new FormData(e.target));
        console.log(dataformulario);
        
        switch(dataformulario.accion){
            case 'get':
                let res = await tablacountries.gettablas(dataformulario.accion,dataformulario.tabla);
                console.log(res);
                
                break;
            case 'post':
                post(res);

                break;
            case 'put':
                put(res);

                break;
            case 'delete':
                delet(res);

                break;
            default:
                alert("Debes selccionar un metodo y una tabla");
        }
    })
}


function post(){
    console.log("pasamos bien por post ");
}



function put(){
    console.log("pasamos bien por gut ");
}



function delet(){
    console.log("pasamos bien por delete ");
}




export default {
    datos
}