function registerStudent(){
    var firstName = document.getElementById('firstname').value;
    var lastName = document.getElementById('lastname').value;
    var finalExam = document.getElementById('finalexam').value;

    let student = {
        firstName: firstName,
        lastName: lastName,
        finalExam: finalExam
    }

    fetch('http://localhost/ajax/register.php',{
        method: 'POST',
        body: JSON.stringify(student)
    }).then((res)=>{
        res.json().then((data)=>{
            console.log(data);
        })
    }).catch((err)=>{
        console.log(err);
    })
}

function getStudents() {
    fetch("http://localhost/ajax/getstudent.php").then((res)=>{
        return res.json()
    }).then((data)=>{
        var list = "";
        for (let i = 0; i < data.length; i++) {
            var li = `<li> ${data[i].id  + data[i].firstName + data[i].lastName}</li>`
            list = list + li;
        }
        document.getElementById("student").innerHTML = list
    }).catch((err)=>{
        console.log(err);
    })
}