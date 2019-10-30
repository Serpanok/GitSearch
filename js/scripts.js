"use strict";

let rulesBlock = document.getElementById("rules")
let baseRule = rulesBlock.querySelector('.rule')
baseRule.querySelector('.rule-delete').addEventListener('click', ruleDeleteEvent)
let ruleTpl = baseRule.cloneNode(true)

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
