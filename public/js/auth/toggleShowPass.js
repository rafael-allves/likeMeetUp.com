export default function toggleShowPass(evt){
    evt.preventDefault();
     // Como o span ta dentro do botão e o clique vai ser no icone o evt.target referencia o span
    //por isso é necessario user parentNode para referenciar o button

    const input = evt.target.parentNode.previousElementSibling;
    //So da uma olhada na estrutura do arquivo auth.blade pra ver pq isso

    input.type = input.type == 'password' ? 'text' : 'password';

    evt.target.innerText = input.type == 'password' ? 'visibility_off' : 'visibility';
}
