export default function emailValidation(email){
    try{
        const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if(!pattern.test(email)) throw "Email Inválido!";

    }catch(err){
        return err;
    }
    return false;
}
