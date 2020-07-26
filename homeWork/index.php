<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Todo</title>
</head>
<body>
    <div class="container" id = "app">
        <h2 align="center">{{message}}</h2>
            <div class="row">
                <div class="col-md-12">
                  <form @submit = "submitData" @reset = "resetData" method="post">
                  <div class = "form-group">
                    <label for="">วิชา</label>
                    <input type="text" v-model ="form.subject" class="form-control">
                  </div>
                  <div class = "form-group">
                    <label for="">การบ้าน</label>
                    <input type="text" v-model ="form.homeWork" class="form-control">
                  </div>
                  <input type="submit" value="submit" v-model = "form.status"class="btn btn-success">
                  <input type="reset" value = "reset" class = "btn btn-danger">
                  </form>
                </div>
    
            </div><br>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Subject</th>
      <th scope="col">Homework</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for = "row in users">
      <th scope="row">{{row.id}}</th>
      <td>{{row.subject}}</td>
      <td>{{row.homework}}</td>
      <td>
       <button class="btn btn-primary" @click="editData(row.id)" >Edit</button>
      </td>
      <td>
       <button class="btn btn-warning" @click="deleteData(row.id)">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
    </div>
    <script src="app.js">
    </script>
</body>
</html>