class Validator{

    //Permet de valider un mot de passe
    static passwordValidator(controlName,value,lengthWord){ 

        return !value.length
        ? {error : true,message :`${controlName}est obligatoire` }
        :value.length < lengthWord
        ? {error:true, message: `${controlName} doit contenir au moins ${lengthWord} caracteres`}
        :((value !="") && (value.startsWith(" ") && value.endsWith(" ")))
             ? {error:true, message : `Les espacements de debut et de fin ne sont pas autorises`}
        : ""; 
    }

    //Permet de valider une adresse email
     static emailValidator(controlName,value)
    { 
        let pattern = '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9._]+\\.[a-zA-Z]{2,4}$';

        return !value.length
        ? {error : true,message :`${controlName} est obligatoire` }
        : !value.match(new RegExp(pattern))
        ? {error : true, message :` ${controlName} doit respecter le pattern example@gmail.com.` }

        : ""; 
   }
    //Permet de valider un numero de telephone
      static phoneValidator(controlName,minLength,maxLength,value)
    { 
        let pattern = '^[0-9]+(\\.?[0-9]+)$';

        return !value.length
        ? {error : true,message :`${controlName} est obligatoire` }
        : !value.match(new RegExp(pattern))
        ? {error : true, message :` ${controlName} ne doit contenir que des chiffres.` }
        :value.length <minLength
        ? {error : true, message :`${controlName} doit contenir au moins ${minLength} chiffres.` }
        :value.length >maxLength
        ? {error : true, message :`${controlName} doit contenir au plus ${maxLength} chiffres.` }

        : null; 
   }
   //Permet de valider un nom compose
         static nameValidator(controlName,minLength,maxLength,value)
    { 
        let pattern = '^[A-Za-à âéèêëîïôùû-]+$';
     
        if(!value){
            return {error:true, message: `${controlName} est obligatoire`}
        }

        if(!value.match(new RegExp(pattern))){
            return {error: true, message: `${controlName} ne doit contenir que des lettres`}
        }

        if( value.length <minLength){
            return{ error : true, message :`${controlName} doit contenir au moins ${minLength} lettres.` }
       }
       if( value.length >maxLength){
         return{ error : true, message :`${controlName} doit contenir au plus ${maxLength} lettres.` }
          }

         if((value != "") && (value.startsWith(" ") || value.endsWith(" "))){
            return{ error : true, message: ` Les espacements de debut et de fin ne sont pas autorises`}
         }
         return null;

     }

   //Permet de valider une adresse
         static adresseValidator(controlName,minLength,maxLength,value)
    { 
       const isContainsNumber = /^(?=.*[0-9]).*$/;   
       const isContainsUpperCase = /^(?=.*[A-Z]).*$/; 
       const isContainsLowerCase = /^(?=.*[a-z]).*$/; 
       const isContainsSymbol = /^(?=.*[-,;.]).*$/; 

        if(!value){
            return {error:true, message: `${controlName} est obligatoire`}
        }

        if(isContainsSymbol.test(value)
         && !isContainsNumber.test(value)
         && !isContainsUpperCase.test(value)
         && !isContainsLowerCase.test(value)
       )      

        {
            return {error: true, message: `${controlName} ne doit contenir que des caracteres speciaux`}
        }

        if( value.length <minLength){
            return{ error : true, message :`${controlName} doit contenir au moins ${minLength} lettres.` }
       }
       if( value.length >maxLength){
         return{ error : true, message :`${controlName} doit contenir au plus ${maxLength} lettres.` }
          }

         if((value !="") && (value.startsWith(" ") || value.endsWith(" "))){
            return{ error : true, message: ` Les espacements de debut et de fin ne sont pas autorises`}
         }
         return null;

    }
        
}