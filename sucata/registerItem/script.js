function checaCampos(e){
    var modelo = document.getElementById("modelo")
    var cor = document.getElementById("cor")
    var preco = document.getElementById("preco")
    var descricao = document.getElementById("descricao")
    var div1 = document.getElementById("div1")
    var div2 = document.getElementById("div2")
    var div3 = document.getElementById("div3")
    var div4 = document.getElementById("div4")
    
    if(modelo.value == ''){
       modelo.style.borderColor = "red";
       div1.setAttribute("class", "alert alert-danger")
       div1.setAttribute("role","alert")
       div1.style.visibility = 'visible'
    }
    else{
        modelo.style.borderColor = "black";
        div1.removeAttribute("class")
        div1.removeAttribute("role")
        div1.style.visibility = 'hidden'
    }


    if(cor.value == ''){
        cor.style.borderColor = "red";
        div2.setAttribute("class", "alert alert-danger")
        div2.setAttribute("role","alert")
        div2.style.visibility = 'visible'

    }
    else{
        cor.style.borderColor = "black";
        div2.removeAttribute("class")
        div2.removeAttribute("role")
        div2.style.visibility = 'hidden'
    }

    if(preco.value == ''){
        preco.style.borderColor = "red";
        div3.setAttribute("class", "alert alert-danger")
        div3.setAttribute("role","alert")
        div3.style.visibility = 'visible'

    }
    else{
        preco.style.borderColor = "black";
        div3.removeAttribute("class")
        div3.removeAttribute("role")
        div3.style.visibility = 'hidden'
    }

    if(descricao.value == ''){
        descricao.style.borderColor = "red";
        div4.setAttribute("class", "alert alert-danger")
        div4.setAttribute("role","alert")
        div4.style.visibility = 'visible'

    }
    else{
        descricao.style.borderColor = "black";
        div4.removeAttribute("class")
        div4.removeAttribute("role")
        div4.style.visibility = 'hidden'
    }

}