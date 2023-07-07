export default function perfilSettings(){
    const userName = document.getElementById('username').value;
    const userEmail = document.getElementById('useremail').value;
    const userBio = document.getElementById('userbio').value;

    axios({
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
          },
        url: `/user/update/${user}`,
        data: {
          name: userName,
          email: userEmail,
          bio: userBio,
        },
      });
}
