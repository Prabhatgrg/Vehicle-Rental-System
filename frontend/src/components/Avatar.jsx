import React from "react";
import { useFetch } from "../hooks";

const Avatar = () => {
    const { data, loading, error } = useFetch(`http://localhost:8080/users`);

    return (
        <div>
            {!loading &&
                data?.map((c) => {
                    return (
                        <>
                            <span>{c?.name?.first}</span>
                        </>
                    );
                })}
        </div>
    );
};

export default Avatar;
