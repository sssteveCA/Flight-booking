<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute deve essere selezionato.',
    'accepted_if' => ':attribute deve essere selezionato se :other è :value.',
    'active_url' => 'The :attribute non è un record DNS valido.',
    'after' => ':attribute deve essere successiva a :date.',
    'after_or_equal' => ':attribute deve essere successiva o uguale a :date.',
    'alpha' => ':attribute può contenere solo lettere.',
    'alpha_dash' => ':attribute può contenere solo lettere, numeri, il carattere dash e l\'underscore.',
    'alpha_num' => ':attribute può contenere solo lettere e numeri.',
    'array' => ':attribute deve essere un array.',
    'before' => ':attribute deve essere una data precedente a :date.',
    'before_or_equal' => ':attribute deve essere una data precedente o uguale a :date.',
    'between' => [
        'numeric' => ':attribute deve essere un numero tra :min e :max.',
        'file' => ':attribute deve essere un file con una dimensione compresa tra :min and :max KB.',
        'string' => ':attribute può avere tra i :min e i :max caratteri.',
        'array' => ':attribute può avere tra i :min e i :max elementi.',
    ],
    'boolean' => ':attribute può avere come valori solo vero o falso.',
    'confirmed' => 'La conferma di :attribute ha un valore diverso.',
    'current_password' => 'La password inserita non è corretta',
    'date' => ':attribute deve essere una data valida.',
    'date_equals' => ':attribute deve essere una data uguale a :date.',
    'date_format' => ':attribute non coincide con il formato :format.',
    'declined' => ':attribute non deve essere selezionato.',
    'declined_if' => ':attribute non deve essere selezionato se :other è :value.',
    'different' => ':attribute e :other devono avere un valore diverso.',
    'digits' => ':attribute deve avere :digits cifre.',
    'digits_between' => ':attribute deve avere tra le :min e le :max cifre.',
    'dimensions' => 'Le dimensioni dell\'immagine specificate per :attribute non sono valide.',
    'distinct' => ':attribute contiene valori duplicati.',
    'email' => ':attribute deve essere un indirizzo email valido.',
    'ends_with' => ':attribute deve terminare con uno dei seguenti valori: :values.',
    'enum' => 'L\' attributo selezionato :attribute non è valido.',
    'exists' => 'L\' attrivuto :attribute non è valido.',
    'file' => ':attribute deve essere un file.',
    'filled' => ':attribute non deve avere un valore vuoto',
    'gt' => [
        'numeric' => ':attribute deve essere maggiore di :value.',
        'file' => ':attribute deve avere una dimensione maggiore di :value KB.',
        'string' => ':attribute deve contenere più di :value caratteri.',
        'array' => ':attribute deve contenere più di :value elementi.',
    ],
    'gte' => [
        'numeric' => ':attribute deve essere maggiore o uguale a :value.',
        'file' => ':attribute deve avere una dimensione maggiore o uguale a :value KB.',
        'string' => ':attribute deve contenere almeno :value caratteri.',
        'array' => ':attribute deve avere almeno :value.',
    ],
    'image' => ':attribute deve essere un file immagine.',
    'in' => ':attribute ha un valore diverso tra quelli possibili.',
    'in_array' => ':attribute non esiste in :other.',
    'integer' => ':attribute deve essere un numero intero.',
    'ip' => ':attribute deve essere un indirizzo IP valido.',
    'ipv4' => ':attribute deve essere un indirizzo IPv4 valido.',
    'ipv6' => ':attribute deve essere un indirizzo IPv6 valido.',
    'mac_address' => ':attribute deve essere un indirizzo MAC valido.',
    'json' => ':attribute deve essere una stringa JSON valida.',
    'lt' => [
        'numeric' => ':attribute deve essere minore di :value.',
        'file' => ':attribute deve avere una dimensione minore di :value KB.',
        'string' => ':attribute deve contenere meno di :value caratteri.',
        'array' => ':attribute deve contenere meno di :value elementi.',
    ],
    'lte' => [
        'numeric' => ':attribute deve essere minore o uguale a :value.',
        'file' => ':attribute non può superare i :value KB.',
        'string' => ':attribute non può avere più di :value caratteri.',
        'array' => ':attribute non deve contenere più di :value elementi.',
    ],
    'max' => [
        'numeric' => ':attribute non può essere maggiore di :max.',
        'file' => ':attribute non può superare i :max KB.',
        'string' => ':attribute non può avere più di :max caratteri.',
        'array' => ':attribute non deve contenere più di :max elementi.',
    ],
    'mimes' => ':attribute deve essere un file di tipo: :values.',
    'mimetypes' => ':attribute deve essere un file di tipo MIME: :values.',
    'min' => [
        'numeric' => ':attribute non può essere minore di :min.',
        'file' => ':attribute deve avere una dimensione pari o maggiore di :min KB.',
        'string' => ':attribute deve contenere almeno :min caratteri.',
        'array' => ':attribute deve avere almeno :min elementi.',
    ],
    'multiple_of' => ':attribute deve essere un multiplo di :value.',
    'not_in' => ':attribute ha un valore non valido.',
    'not_regex' => ':attribute ha un formato non valido.',
    'numeric' => ':attribute deve essere un numero.',
    'password' => 'La password inserita non è corretta.',
    'present' => ':attribute deve contenere un valore.',
    'prohibited' => ':attribute deve essere vuoto o non presente.',
    'prohibited_if' => ':attribute deve essere vuoto o non presente se :other è uguale a :value.',
    'prohibited_unless' => ':attribute deve essere vuoto o non presente tranne se :other è uguale a :values.',
    'prohibits' => 'L\' attributo :attribute non permette :other di essere presenti.',
    'regex' => 'Il formato di :attribute non è valido.',
    'required' => ':attribute è obbligatorio.',
    'required_if' => ':attribute è obbligatorio se :other è uguale a :value.',
    'required_unless' => ':attribute è obbligatorio a meno che :other non sia uguale a :values.',
    'required_with' => ':attribute è obbligatorio se è presente almeno uno di questi valori: :values.',
    'required_with_all' => ':attribute è obbligatorio se sono presenti tutti questi valori',
    'required_without' => ':attribute è obbligatorio, se non è presente almeno uno di questi valori: :values.',
    'required_without_all' => ':attribute è obbligatorio, se non è presente nessuno di questi valori :values.',
    'same' => 'Il valore di :attribute deve essere identico a quello di :other.',
    'size' => [
        'numeric' => 'il valore di :attribute deve essere :size.',
        'file' => ':attribute deve avere una dimensione pari a :size KB.',
        'string' => ':attribute deve avere :size caratteri.',
        'array' => ':attribute deve contenere :size elementi.',
    ],
    'starts_with' => ':attribute deve iniziare con uno dei seguenti valori: :values.',
    'string' => ':attribute deve essere una stringa.',
    'timezone' => ':attribute deve essere un fuso orario.',
    'unique' => 'L\' :attribute inserito esiste già.',
    'uploaded' => 'Il file :attribute non è stato caricato.',
    'url' => ':attribute deve essere un URL valido.',
    'uuid' => ':attribute deve essere un identificato UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'Nome utente',
        'email' => 'Indirizzo email',
        'password' => 'Password',
        'password_confirmation' => 'Password di conferma'
    ],

];
