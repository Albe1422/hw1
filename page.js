function onJson(json) {
  const library = document.querySelector('#album-view');
  library.innerHTML = '';
  const r = json.albums.items;
  let num = r.length;
  if(num > 10)
    num = 20;
  for(let i=0; i<num; i++)
  {
    const album_data = r[i]
    const title = album_data.name;
    const img_like = document.createElement('img');
    img_like.classList.add("like");
    const selected_image = album_data.images[0].url;
    const album = document.createElement('div');
    album.classList.add('album');
    const img = document.createElement('img');
    img.classList.add("foto");
    img.src = selected_image;
    img_like.src="cuore.png";
    const caption = document.createElement('span');
    caption.textContent = title;
    album.appendChild(img);
    album.appendChild(caption);
    album.appendChild(img_like);
    library.appendChild(album);
  }
  const immagine =document.querySelectorAll('.album');
  for(const c of immagine){
  c.addEventListener('click', seleziona);
}
}





function seleziona(event)
{
 
  const scelta = event.currentTarget;
  const titolo = scelta.querySelector('span').textContent;
  const immagine = scelta.querySelector('img').src;
  const image = scelta.querySelector('.like');
  image.src = 'cuore_pieno.png';
  
  fetch('acquisisci2.php?&titolo='+titolo+'&immagine='+immagine);
  
  
}















function search(event)
  {
    event.preventDefault();
    const album_input = document.querySelector('#album');
    const album_value = encodeURIComponent(album_input.value);
    console.log('Eseguo ricerca: ' + album_value);
    fetch("https://api.spotify.com/v1/search?type=album&q=" + album_value,
      {
        headers:
        {
          'Authorization': 'Bearer ' + token
        }
      }
    ).then(onResponse).then(onJson);
  }
  
  function onTokenJson(json)
{
  token = json.access_token;
}

function onTokenResponse(response)
{
  return response.json();
}
  
  function onResponse(Response){
    return Response.json();
  
  }
  const client_id = '38d99715f7e547b1b9a23b96f8114cdc';
  const client_secret = '9faacb3d8bdb43bf8f65a5c86dc970cc';
  
  let token;
  fetch("https://accounts.spotify.com/api/token",
      {
     method: "post",
     body: 'grant_type=client_credentials',
     headers:
     {
      'Content-Type': 'application/x-www-form-urlencoded',
      'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
     }
    }
  ).then(onTokenResponse).then(onTokenJson);
  
  
  const form2 = document.querySelector('#due');
  form2.addEventListener('submit', search);