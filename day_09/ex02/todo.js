
var toDoList = {
    //To Do List
    
    toDos: [],
    
    // To Do List Methods
  
    addToDos: function(toDoText){
      this.toDos.push({
        toDoText: toDoText,
        completed: false
      });
    },
    deleteToDos: function(position){
      this.toDos.splice(position, 1);
    }
  };
  
  //Display list
  var view = {
    displayToDos: function(){
      var toDosUl = document.querySelector("ul");
      toDosUl.innerHTML = '';
      for(var i = 0; i < toDoList.toDos.length; i++){
        var toDosLi = document.createElement("li");
        var toDo = toDoList.toDos[i];
        var toDoWithCompletion = '';
        
        if(toDo.completed === true){
          toDoWithCompletion = '(X) ' + toDo.toDoText;
        } else {
          toDoWithCompletion = '( ) ' + toDo.toDoText;
        }
        
        toDosLi.textContent = toDoWithCompletion;
        toDosUl.appendChild(toDosLi);
      }
    }
  }
  
  
  
  
  //Event handlers
  
  var handlers = {
    
    addToDo: function(){
      var addToDoTextInput = document.getElementById("addToDo");
      toDoList.addToDos(addToDoTextInput.value);
      addToDoTextInput.value = '';
      view.displayToDos();
    },
    
    deleteToDo: function(){
      var toDoPosition = document.getElementById("deleteToDoPosition");
      toDoList.deleteToDos(toDoPosition.valueAsNumber);
      toDoPosition.value = '';
      view.displayToDos();
    }
  }
  
  
  
  
  
  