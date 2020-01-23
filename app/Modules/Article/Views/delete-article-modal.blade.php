<div class="modal fade" id="deleteArticleModal{{$article_id}}" tabindex="-1" role="dialog" aria-labelledby="deleteArticleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this article {{$article_id}}</p>
            </div>
            <div class="modal-footer">
                <form id="delForm" action="{{route('articles.destroy', ['article' => $article_id])}}" method="POST">
                    {{method_field('DELETE')}} {{csrf_field()}}
                    <button type="submit" value="delete" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
