"use strict";

let rulesBlock = document.getElementById("rules")
let baseRule = rulesBlock.querySelector('.rule')
baseRule.querySelector('.rule-delete').addEventListener('click', ruleDeleteEvent)
let ruleTpl = baseRule.cloneNode(true)
let results = document.getElementById('results')

document.getElementById('rulesAdd').addEventListener('click', ()=>{
	let newRule = ruleTpl.cloneNode(true)
	newRule.querySelector('.rule-delete').addEventListener('click', ruleDeleteEvent)
	
	rulesBlock.appendChild(newRule)
})

document.getElementById('rulesClear').addEventListener('click', ()=>{
	rulesBlock.innerHTML = '';
	
	document.getElementById('rulesAdd').dispatchEvent(new Event('click'))
})

function ruleDeleteEvent()
{
	rulesBlock.removeChild(this.parentElement.parentElement)
}

document.getElementById('searchForm').addEventListener('submit', function(event){
	event.preventDefault()
	
	let formData = new FormData(this);
	let url = '/app/getRepositoriesAPI.php?'
	
	for(let [name, value] of formData)
	{
		url += name + '=' + value + '&';
	}

  	var xhr = new XMLHttpRequest()
  	xhr.open("GET", url)
	xhr.onreadystatechange = function() {
		if (this.readyState != 4) return
		
		let json = JSON.parse(this.responseText)
		
		results.innerHTML = ''
		
		for(let key in json.items)
		{
			console.log(key)
			
			let item = json.items[key]
			
			let Name = document.createElement('td')
			Name.textContent = item.full_name
			let Size = document.createElement('td')
			Size.textContent = item.size
			let Forks = document.createElement('td')
			Forks.textContent = item.forks_count
			let Followers = document.createElement('td')
			Followers.textContent = item.followers
			let Stars = document.createElement('td')
			Stars.textContent = item.stars
			
			let tr = document.createElement('tr')
			tr.appendChild(Name)
			tr.appendChild(Size)
			tr.appendChild(Forks)
			tr.appendChild(Followers)
			tr.appendChild(Stars)
			
			results.appendChild(tr)
		}
	}
  	xhr.send()
})
