const speech = new SpeechSynthesisUtterance();
function Read(toRead){
  
    let voices = speechSynthesis.getVoices();


   // toRead = document.getElementById('read').textContent;

    speech.text = toRead;

    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;
    speech.voices = voices[2];

    window.speechSynthesis.speak(speech);  
}

function Stop()
{
  window.speechSynthesis.cancel();

}
function Pause()
{
      window.speechSynthesis.pause();
}
function Resume(){
      window.speechSynthesis.resume(speech);
}


let scp001 = document.getElementById('1').innerText;
document.getElementById('button1').onclick = () => Read(scp001);
let scp002 = document.getElementById('2').innerText;
document.getElementById('button2').onclick = () => Read(scp002);
let scp003 = document.getElementById('3').innerText;
document.getElementById('button3').onclick = () => Read(scp003);
let scp004 = document.getElementById('4').innerText;
document.getElementById('button4').onclick = () => Read(scp004);
let scp005 = document.getElementById('5').innerText;
document.getElementById('button5').onclick = () => Read(scp005);
let scp006 = document.getElementById('6').innerText;
document.getElementById('button6').onclick = () => Read(scp006);