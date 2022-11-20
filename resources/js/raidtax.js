let select1 = document.getElementById('select_1');
let voti_n = document.getElementById('voti-n');
let voti_hc = document.getElementById('voti-hc');
let voti_m = document.getElementById('voti-m');

function selector(raid)
{
  console.log(raid.value);
  if(raid.value === 1){
    voti_n.classList.remove('hidden');
  }
};