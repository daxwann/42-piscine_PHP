
var toDoList = {
    //To Do List
    toDos: [],
    
    // To Do List Methods
    addToDos: function(toDoText){
      this.toDos.unshift(toDoText);
    },

    deleteToDos: function(position){
      this.toDos.splice(position, 1);
    },

    saveCookie: function(){
      document.cookie = "toDoList=" + this.toDos.join();
      console.log(this.toDos);
    },

    loadCookie: function(){
      var cookie = "; " + document.cookie;
      var parts = cookie.split("; toDoList=");
      if (parts.length == 2) {
        str = parts.pop().split(";").shift();
        arr = str.split(",");
        if (arr[0] != "") {
          this.toDos = arr;
        }
      }
    }
  };
  
  //Display list
  var view = {
    displayToDos: function(){
      var ft_list = $("#ft_list");
      ft_list.empty();
      for(var i = 0; i < toDoList.toDos.length; i++){
        var toDo = toDoList.toDos[i];
        if (toDo != "") {
        var toDosLi = $("<div>", {"class": "toDo", "id": `${i}`, "onclick": "handlers.deleteToDo(this.id)"});
        toDosLi.text(toDo);
        ft_list.append(toDosLi);
        }
      }
    }
  }

  //Event handlers
  var handlers = {

    onLoad: function(){
      toDoList.loadCookie();
    },
    
    addToDo: function(){
      var task = prompt("What's the task you want to add?");
      if (task != "" && task != null) {
        toDoList.addToDos(task);
        view.displayToDos();
        toDoList.saveCookie();
      }
    },
    
    deleteToDo: function(id){
      if (confirm("are you sure you want to delete task?")) {
        var toDoPosition = Number(id);
        toDoList.deleteToDos(toDoPosition);
        view.displayToDos();
        toDoList.saveCookie();
      }
    }
  }

  //window onload
  window.onload = function(event) {
    handlers.onLoad();
    view.displayToDos();
  }
  
  
  
  
  
  