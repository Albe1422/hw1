fetch('stampa.php').then(searchResponse).then(searchJson);
 
function searchResponse(response)
{
console.log(response);
  return response.json();
  
}

function searchJson(json)
{   
  const risultati = json;
  const notizia = document.querySelector('#library');

console.log(risultati);
  for(let r of risultati){
  const new1 = document.createElement('div'); 
  new1.classList.add('new1');
  
  const titolo = document.createElement('h1');
  titolo.textContent= r.titolo;
  const immagine = document.createElement('img');
  immagine.src= r.img;
  const autore = document.createElement('h3');
  autore.textContent= r.autore;
  const descrizione = document.createElement('span');
  descrizione.textContent= r.contenuto;

  const img = document.createElement("img"); 
  img.classList.add('like');
  img.src = "cuore_pieno.png";

  
  new1.appendChild(immagine);
  new1.appendChild(titolo);
  new1.appendChild(autore);
  new1.appendChild(descrizione);
  new1.appendChild(img);

  notizia.appendChild(new1);


  }
  const immagine=document.querySelectorAll('.new1');
  for(let b of immagine){
    b.addEventListener('click', seleziona);
  }
}

function seleziona(event)
{
 
  const scelta = event.currentTarget;
  const titolo = scelta.querySelector('h1').textContent;
  const image = scelta.querySelector('.like');
  image.src = 'cuore.png';
  
  fetch('elimina.php?&titolo='+titolo);
  location.href='preferiti.php';
  
}
