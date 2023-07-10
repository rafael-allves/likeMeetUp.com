export default function perfilSettings(evt){
    evt.preventDefault();
    const profilePic = document.getElementById('file').files[0];
    const userName = document.getElementById('username').value;
    const userEmail = document.getElementById('useremail').value;
    const userBio = document.getElementById('userbio').value;


    const formData = new FormData();
    formData.append('_method', "PUT")//Isso é necessário para poder receber o put la no backend ou isso ou mudar o tipo para x-www-form-control, mas n posso mudar para x-www-form-control pois preciso enviar imagens
    formData.append('profile_pic', profilePic);
    formData.append('name', userName);
    formData.append('email', userEmail);
    formData.append('bio', userBio);

    console.log(formData)

    axios.post(`/user/update/${user}`,formData,
    {
        headers: {
            'Content-Type': 'multipart/form-data',
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        }
    })
    .then(data =>  data)
    .catch(err => console.log(err));
}

