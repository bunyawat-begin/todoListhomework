var app = new Vue({
  el: '#app',
  data: {
    users :"",
    message: 'ToDoList',
    form: {
      id:"",
      subject:"",
      homeWork:"",
      isEdit:false,  //for Check
      status:"submit",
    }
  },
  methods:{
    submitData(e){
      e.preventDefault()
      if(this.form.subject != "" && this.form.homeWork != "" && !this.form.isEdit){
        //saved Data
        axios.post("action.php",{
          subject:this.form.subject,
          homeWork:this.form.homeWork,
          action:"insert"
      }).then(function(res){
          app.resetData()
          app.getAllUsers()
      })
      }
      //UpdateData
      if(this.form.subject != "" && this.form.homeWork != "" && this.form.isEdit){
        //console.log("update")

        axios.post("action.php",{
          id:this.form.id,
          subject:this.form.subject,
          homeWork:this.form.homeWork,
          action:"updateData"
      }).then(function(res){
          app.resetData()
          app.getAllUsers()
      })
      }
    },
    resetData(e){
      //reset all event and data
      console.log("reseted DATA")
      this.form.id = ""
      this.form.subject=""
      this.form.homeWork=""
      this.form.status = "submit"
      this.form.isEdit = false
    },
    getAllUsers(){
      axios.post("action.php",{
        action:"getAllUser"
    }).then(function(res){
        app.users = res.data
        console.log(app.users)
    })
    },
    editData(id){
      this.form.status="Update"
      this.form.isEdit=true
      //queryUserYouEdit
      axios.post("action.php",{
        action:"getEditUser",
        id:id
    }).then(function(res){
        app.form.id = res.data.id
        app.form.subject = res.data.subject
        app.form.homeWork = res.data.homeWork

        console.log(res.data)
    })

    },
    deleteData(id){
      if(confirm("R U sure U want 2 deleted" +id+"?")){
        axios.post("action.php",{
          action:"delete",
          id:id
      }).then(function(res){
        alert(res.data.message)
        app.resetData()
        app.getAllUsers()
      })
      }
     

    }
  },
  created(){
    this.getAllUsers()
  }
})