form=document.getElementsByTagName("form")[0]
span=document.getElementById('banknotami')

function SumofMoney(money){
    sum=0

    return sum
}

show=false
money={
    "500":0,
    "200":0,
    "100":0,
    "50":0,
    "20":0,
    "10":0,
    "5":0,
    "2":0,
    "1":0,
    "0.5":0,
    "0.2":0,
    "0.1":0,
    "0.05":0,
    "0.02":0,
    "0.01":0
}
form.ifbanknotami.addEventListener("change",(event)=>{
    event.preventDefault()
    if(show==false){
        show=true
        form.kwota.disabled=true
        form.kwota.value=0
        for (var key in money) {
            span.innerHTML+=key+"zł:"
            input=document.createElement("input")
            input.setAttribute("type","number")
            input.setAttribute("min","0")
            input.setAttribute("step","1")
            input.setAttribute("name",key)
            input.setAttribute("value",'0')
            span.appendChild(input)
            span.innerHTML+="<br>"
            console.log(input)
        }
        form.kwota.value=SumofMoney(money)
    }else{
        span.innerHTML=''
        form.kwota.disabled=false
        show=false
    }
})