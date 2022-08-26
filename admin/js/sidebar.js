function showAddCategoryForm(){
    if(document.getElementById('add-category-form').style.display === "none"){
        document.getElementById('add-category-form').style.display = "block";
        document.getElementById("add-category-icon").classList.remove("fa-plus")
        document.getElementById("add-category-icon").classList.add("fa-minus")
    }
    else{
        document.getElementById('add-category-form').style.display = "none";
        document.getElementById("add-category-icon").classList.remove("fa-minus")
        document.getElementById("add-category-icon").classList.add("fa-plus")
    }
}