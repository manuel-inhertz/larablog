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
           content: this.getContent(this.props.content)
        };
    }

    getContent = (content) => {
        try {
            return JSON.parse(content);
        } catch (err) {
            return {};
        }
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
    const content = document
      .getElementById("flexible-content")
      .getAttribute("data-content");
    ReactDOM.render(<FlexibleContent content={content} />, document.getElementById('flexible-content'));
}
