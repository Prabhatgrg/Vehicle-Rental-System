import mongoose from 'mongoose';
const { Schema, model } = mongoose;

const userSchema = new Schema({
  name: String,
  address: String,
  phone: Number,
//   content: String,
//   tags: [String],
//   createdAt: Date,
//   updatedAt: Date,
//   comments: [{
//     user: String,
//     content: String,
//     votes: Number
//   }]
});

const User = model('User', userSchema);
export default User;