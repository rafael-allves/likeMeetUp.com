export default function toggleShowPass(evt){
     // Como o span ta dentro do botão e o clique vai ser no icone o evt.target referencia o span
    //por isso é necessario usar currentTarget para referenciar o button
    //outra solução pra evitar aql sintaxe podre de currentTarget.chuldren[0] é usar evt.stopPropagation entendendo que quem recebe o evento é o span
    //Entretando o span so recebe o evento se o usuário clicar EXATAMENTE no span, logo a melhor forma que eu decidi foi deixar com currentTarget
    const input = evt.currentTarget.previousElementSibling;
    //So da uma olhada na estrutura do arquivo auth.blade pra ver pq isso

    input.type = input.type == 'password' ? 'text' : 'password';

    evt.currentTarget.children[0].innerText = input.type == 'password' ? 'visibility_off' : 'visibility';
}
