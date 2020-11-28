<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Create Book</div>
            <div class="panel-body">
                <form class="form-horizontal" action="/action_page.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="text_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="text_email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="publication">Publication:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="publication" placeholder="Enter publication" name="text_publication">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">Description:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="text_description" id="description" placeholder="Enter Description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="book_image">Book Image:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="book_image"  name="text_book_image">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="book_cost">Book Cost:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="book_cost" placeholder="Enter publication" name="text_book_cost">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="status">Status:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
