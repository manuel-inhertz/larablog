import React from 'react';
import ReactDOM from 'react-dom';
import Editor from '@stfy/react-editor.js'
import Header from '@editorjs/header';
import ImageTool from '@editorjs/image';
import Delimiter from '@editorjs/delimiter';

class FlexibleContent extends React.Component {
    
    constructor(props) {
        super(props);
        this.state = {
           content: {
                "time" : new Date().getTime(),
                "blocks" : [],
                "version" : "2.12.4"
            }
        };
    }

    handleEditorChange = (e) => {
        //this.setState((prevState, props) => ({
            //
       // }));
    }


    render() {
        return (
            <div id="FlexibleContentBlocks">
                <input type="hidden" name="content" value={this.state.content} />
                <div id="editorjs-container">
                    <Editor
                        autofocus
                        holder="editorjs-container"
                        //excludeDefaultTools={['header']}
                        onChange={() => console.log('Something is changing!!')}
                        onData={(data) => this.setState({content: JSON.stringify(data)})}
                        onReady={() => console.log('EditorJs is ready!')}
                        placeholder='Start by typing something or click on the + sign to add a block!'
                        tools={{ 
                            header: Header, 
                            image: ImageTool,
                            delimiter: Delimiter
                        }} 
                        data={this.state.content}
                    />
                </div>
            </div>
        );
    }
}

export default FlexibleContent;

if (document.getElementById('flexible-content')) {
    const atts = document.getElementById('flexible-content').attributes;
    console.log(atts);
    ReactDOM.render(<FlexibleContent />, document.getElementById('flexible-content'));
}
