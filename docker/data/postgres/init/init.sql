CREATE TABLE list (
    id  SERIAL NOT NULL,
    category TEXT,
    value TEXT,
    data JSONB DEFAULT '{}',
    PRIMARY KEY (id)
);

INSERT INTO list (category, value, data) VALUES
    ('category1', 'hello', '{"key1": "hello", "key2":"world"}'::jsonb),
    ('category1', 'world', '{"key2": "world"}'::jsonb),
    ('category2', 'hello world', '{"key1": ""}'::jsonb),
    ('category2', '', '{"key2": ""}'::jsonb),
    ('category3', 'HelloWorld', '{"key1": "", "key2": ""}'::jsonb),
    ('category4', 'HELLO WORLD', '{}'::jsonb)
;
