import React from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';
import Post from './Post';

class PostsContainer extends React.Component {
    constructor(props) {
        super(props);
        this.state = { posts : {} };
    }
    
    componentDidMount = () => {
       console.log('PostsContainer component is mounted');
       this.getPosts('/api/posts');
    }

    getPosts = (api) => {
        Axios.get(api)
        .then((res) => {
            this.setState({posts:res.data});
        })
        .catch(err => {
            console.log(err);
            return err;
        });
    }

    render() {
        return (
            <div className="row">
                {
                    Object.keys(this.state.posts).map((post, i) => {
                        return <Post post={this.state.posts[post]} key={i} />
                    })
                }
            </div>
        );
    }
}

export default PostsContainer;

if (document.getElementById('posts-container')) {
    ReactDOM.render(<PostsContainer />, document.getElementById('posts-container'));
}
