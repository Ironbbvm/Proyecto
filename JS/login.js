const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones={
    dni: /^\d{7,9}$/,  //de 7 a 8 numeros
    password: /^.{4,12}$/, //4 a 12 digitos
}



const campos={
    dni: false,
    password: false

}

const validarForulario = (e)=>{
    switch(e.target.name){
        case "dni":
            validarCampo(expresiones.dni, e.target, 'dni');
        break;
        case "password":
            validarCampo(expresiones.password, e.target, 'password');
            validarPassword2();
        break;
        
    }


}

const validarCampo = (expresion, input, campo) =>{
    if(expresion.test(input.value)){
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
        guardar[campo] = input.value;
    }else{
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle'); 
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo]=false;
    }
}

inputs.forEach((input)=>{
    input.addEventListener('keyup', validarForulario);
    input.addEventListener('blur', validarForulario );
});


formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    const terminos = document.getElementById('terminos');
    if(campos.dni && campos.password){
        console.log("Formulario enviado exitosamente");
        document.formulario.submit()

    }else{
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo')
    }

    
});

