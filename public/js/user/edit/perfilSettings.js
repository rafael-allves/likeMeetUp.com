export default function perfilSettings(evt){
    evt.preventDefault();
    const profilePic = document.getElementById('file').files[0];
    const userName = document.getElementById('username').value;
    const userEmail = document.getElementById('useremail').value;
    const userBio = document.getElementById('userbio').value;

    axios.post(`/user/update/${user}`,{
          profile_pic: profilePic,
          name: userName,
          email: userEmail,
          bio: userBio,
        },{
        headers: {
            'Content-Type': 'multipart/form-data',
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        }
    });
}

