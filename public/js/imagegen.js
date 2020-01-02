/* 
*  test script to put right unsplash image
*  may be better to implement this directly in PHP as it's related to post management ?
*  for now it just picks a random image from the keywords specified in the variable keywords
*  below.
*
*/

//set one keyword for the image, will need to be chosen bet
//let keyword = 'image';

let keywords = ['nature', 'urban', 'architecture', 'beach', 'winter', 'summer', 'spring', 'autumn', 'work', 'design'];

//target url with the selected keyword
//let url = `https://source.unsplash.com/1600x900/?${keywords}`;

//select card image
let cardImage = document.querySelector(".card-image");

//map through each card to
//change src of the image to put the right image
const cardImages = document.querySelectorAll(".card-image");
	[...cardImages].forEach(cardImage => {
            var keyword = keywords[Math.floor(Math.random() * keywords.length)];
            cardImage.src = `https://source.unsplash.com/1600x300/?${keyword}`;
	});
