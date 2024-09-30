let scanner = null;
let content2;
// Add event listener to start button
const startButton = document.getElementById('start-btn');
startButton.addEventListener('click', () => {
if (!scanner) {
  scanner = new Instascan.Scanner({video: document.getElementById('preview')});
  scanner.addListener('scan', function (content) {
    document.getElementById('mytext').value=content;
  });
}

Instascan.Camera.getCameras().then(function (cameras) {
  if (cameras.length > 0) {
    scanner.start(cameras[0]);
    document.getElementById('output').innerText = '';
  } else {
    console.error('No cameras found.');
  }
}).catch(function (e) {
  console.error(`Could not start camera: ${e}`);
});
});

// Add event listener to stop button
const stopButton = document.getElementById('stop-btn');
stopButton.addEventListener('click', () => {
if (scanner) {
  scanner.stop();
  console.log(content2);
  document.getElementById('output2').innerText =content2;
}
});