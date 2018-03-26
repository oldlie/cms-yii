<div class="modal fade" id="<?=formId?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">添加轮播图</h4>
        </div>
        <div class="modal-body">
            <form role="form">
            
                <div class="box-body">
                    <div class="form-group">
                        <label for="slideOrderInput">排序</label>
                        <input type="number" class="form-control" id="slideOrderInput" placeholder="轮播根据排序数字从小到大排列">
                    </div>
                    <div class="form-group">
                        <label for="slideTitleInput">标题</label>
                        <input type="text" class="form-control" id="slideTitleInput" placeholder="轮播标题">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>