export default function perfilSettings(evt){
    evt.preventDefault();
    const profilePic = document.getElementById('file').files[0];
    const userName = document.getElementById('username').value;
    const userEmail = document.getElementById('useremail').value;
    const userBio = document.getElementById('userbio').value;


    const formData = new FormData();
    formData.append('profile_pic', profilePic);
    formData.append('name', userName);
    formData.append('email', userEmail);
    formData.append('bio', userBio);

    console.log(formData)

    axios.put(`/user/update/${user}`,formData,
    {
        headers: {
            'Content-Type': 'multipart/form-data',
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        }
    })
    .then(data =>  data)
    .catch(err => console.log(err));
}

