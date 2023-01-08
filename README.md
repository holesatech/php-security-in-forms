# php security in forms
PHP securing forms when submitting, handle injections in input field which might be harmful

to overcome header injection insert the following in script that handle submition

    foreach($_POST as $key => $value){

        $_POST[$key] = _cleaninjections(trim($value));
    }
