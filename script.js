document.addEventListener('DOMContentLoaded', function () {
    fetchData();
});

async function fetchData() {
    try {
        const response = await fetch('/API/index.php');
        const data = await response.json();

        // Process each item in the array and create HTML
        data.forEach(async function (item) {
            const tamuDiv = document.createElement('div');
            tamuDiv.classList.add('tamu');
            const pengenalDiv = document.createElement('div');
            pengenalDiv.classList.add('pengenal');
            const namaSpan = document.createElement('span');
            namaSpan.textContent = item.nama;
            pengenalDiv.appendChild(namaSpan);
            const emailSpan = document.createElement('span');
            emailSpan.textContent = item.email;
            pengenalDiv.appendChild(emailSpan);
            const isipesanDiv = document.createElement('div');
            isipesanDiv.classList.add('isipesan');
            isipesanDiv.textContent = item.isipesan;
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';

            deleteButton.addEventListener('click', async function () {
                console.log(item.id);
                await hapusdata(item.id);
            });

            tamuDiv.appendChild(pengenalDiv);
            tamuDiv.appendChild(isipesanDiv);
            tamuDiv.appendChild(deleteButton);
            document.getElementById('history').appendChild(tamuDiv);
        });
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}
function validateform(){
	let isipesan = document.getElementById('pesan').value;
	if(isipesan.length>500){
		alert("Isi pesan tidak boleh lebih dari 500 karakter");
		return false;
	}
	return true;
}
async function hapusdata(id) {
    let responseText;

    try {
        const response = await fetch(`/API/hapus.php?id=${id}`, {
            method: 'GET',
        });

        if (response.status !== 200) {
            throw new Error(`Failed to delete data. HTTP status code: ${response.status}`);
        }
        responseText = await response.text();
        const data = await response.json();
        console.log(data);
        alert(JSON.stringify(data));
    } catch (error) {
        alert(responseText);
        window.location = '/';
    }
}


