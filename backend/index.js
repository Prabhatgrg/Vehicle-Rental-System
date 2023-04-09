import express from 'express';
import User from './database/User';

const app = express();
const PORT = 8000;

// HTTP GET Request
app.get('/', (req, res)=>{
    res.status(201).json("HOME GET REQUEST");
});

// Start Server
app.listen(PORT, ()=>{
    console.log(`Listening at PORT ${PORT}`)
});