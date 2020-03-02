import React from 'react';

function strip(html) {
    // Rule to remove inline CSS.
    return html.replace(/<style[^>]*>.*<\/style>/gm, '')
    // Rule to remove all opening, closing and orphan HTML tags.
        .replace(/<[^>]+>/gm, '')
    // Rule to remove leading spaces and repeated CR/LF.
        .replace(/([\r\n]+ +)+/gm, '');
}

function Post(props) {
    return (
        <div className="col-md-6">
            <div className="card">
                <img src={props.post.image} className="card-img-top" alt={`Image about ${props.post.title}`} />
                <div className="card-body">
                    <h5 className="card-title">{props.post.title}</h5>
                    <p className="card-text"><small className="text-muted">Post by { props.post.user_id }</small></p>
                    <p className="card-text">{strip(props.post.content).substring(0, 120) + '...'}</p>
                    <a href={`/post/${props.post.alias}`} className="btn btn-sm btn-primary">Read more <i className="fas fa-chevron-right"></i></a>
                </div>
            </div> 
        </div>    
    );
}

export default Post;
