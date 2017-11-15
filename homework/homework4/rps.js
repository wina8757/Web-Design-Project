var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var cpuChoice;
var userChoice;

function startGame() {
	document.getElementById('introScreen').style.display = 'none';
}

function replay() {
	location.reload();
}

// function replay() {
// 	document.getElementById('endScreen').style.display = 'none';
// 	btnGo.style.display = 'none';
	
// 	deselectAll();
	
// 	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
// 	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
// 	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
// 	imgPlayer.src = 'images/player.jpg';
// 	document.getElementById('imgComputer').src = 'images/cpu.png';
// }

function deselectAll() {
	btnPaper.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';
	btnRock.style.backgroundColor = 'silver';
}

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
	btnGo = document.getElementById("btnGo");
	deselectAll();
}

function select(choice) {
	userChoice = choice;
	imgPlayer.src = 'images/' + choice + '.png';
	deselectAll();
	if(choice == 'rock')
		btnRock.style.backgroundColor = '#888888';
	if(choice == 'paper')
		btnPaper.style.backgroundColor = '#888888';
	if(choice == 'scissors')
		btnScissors.style.backgroundColor = '#888888';
		
	// btnGo.style.visibility = 'visible';
	btnGo.style.display = 'block';
}	

function go() {
	var txtEndTitle = document.getElementById('txtEndTitle');
	var txtEndMessage = document.getElementById('txtEndMessage');
	
	var num = Math.floor(Math.random()*3);
	var imgComputer = document.getElementById('imgComputer');
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	if(num == 0) {
		cpuChoice = 'rock';
		imgComputer.src = 'images/rock.png';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		if(userChoice == 'rock') {
				txtEndTitle.innerHTML = '';
				txtEndMessage.innerHTML = 'TIE';
				// alert('t')
		}
		else if(userChoice == 'paper') {
			txtEndTitle.innerHTML = 'Paper covers Rock';
			txtEndMessage.innerHTML = 'YOU WIN';
		}
		else if(userChoice == 'scissors') {
			txtEndTitle.innerHTML = 'Rock smashes Scissors';
			txtEndMessage.innerHTML = 'YOU LOSE';
		} 
	}
	else if(num == 1) { 
		cpuChoice = 'paper';
		imgComputer.src = 'images/paper.png';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		if(userChoice == 'rock') {
			txtEndTitle.innerHTML = 'Paper covers Rock';
			txtEndMessage.innerHTML = 'YOU LOSE';
		}
		else if(userChoice == 'paper') {
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'TIE';
		}
		else if(userChoice == 'scissors') {
			txtEndTitle.innerHTML = 'Scissors cuts Paper';
			txtEndMessage.innerHTML = 'YOU WIN';
		} 
	}
	else if(num == 2) { 
		cpuChoice = 'scissors';
		imgComputer.src = 'images/scissors.png';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		if(userChoice == 'rock') {
			txtEndTitle.innerHTML = 'Rock smashes Scissors';
			txtEndMessage.innerHTML = 'YOU WIN';
		}
		if(userChoice == 'paper') {
			txtEndTitle.innerHTML = 'Scissors cuts Paper';
			txtEndMessage.innerHTML = 'YOU LOSE';
		}
		if(userChoice == 'scissors') {
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'TIE';
		} 
	}
	
	document.getElementById('endScreen').style.display = 'block';
}

