import mongoose from "mongoose";
import User from "./User.js";

const uri = "mongodb+srv://<username>:<password>@cluster0.zwqndul.mongodb.net/?retryWrites=true&w=majority";

mongoose.connect(uri);

// Create a new user object
const user = new User({
  name: 'Prabhat Gurung',
  address: 'Naikap',
  age: 23
//   content: 'This is the best post ever',
//   tags: ['featured', 'announcement'],
});

// Insert the user in our MongoDB database
await user.save();

const firstUser = await User.findOne({});
console.log(firstUser);