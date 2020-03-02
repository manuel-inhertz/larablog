import React from "react";
import AceEditor from "react-ace";

import "ace-builds/src-noconflict/mode-html";
import "ace-builds/src-noconflict/theme-github";

// Render editor
function Code(props) {
    return (
        <div className="code-block my-4">
            <AceEditor
                mode="html"
                theme="github"
                onBlur={props.onBlur}
                name={`code-block-${Math.round(Math.random() * 100)}`}
                editorProps={{ $blockScrolling: true }}
                width="100%"
                height="340px"
            />
        </div>
    )
}

export default Code;