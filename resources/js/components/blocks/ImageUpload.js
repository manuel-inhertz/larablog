import React from 'react';
import Axios from 'axios';

class ImageUpload extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            disabled: false,
            submitted: false,
            imgUrl: ''
        }
    }

    handleUpload = (e) => {
        let formData = new FormData(); // instantiate it
        formData.set('file', e[0]);
        Axios.post(this.props.action, formData, {
        headers: {
        'content-type': 'multipart/form-data' // do not forget this 
        }})
        .then((req) => {
            this.setState({
                disabled: true, 
                submitted: true,
                imgUrl: req.data,
            });
            console.log(req);
        });
    }
    
    render() {
        return (
            <div className="image-upload-block my-4">
                <div className="d-flex">
                    <input type="file" name='image-upload' disabled={this.state.disabled} onChange={this.handleUpload}></input>
                </div>
                {
                    (this.state.submitted) ? <img src={this.state.imgUrl} className="img-fluid" /> : null
                }
            </div>
        );
    }
}

export default ImageUpload;
