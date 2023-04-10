import React from "react";
import { Container, Row, Col } from "react-bootstrap";
import styled from "styled-components";

const Home = () => {
    return (
        <Wrapper>
            <Container>
                <Row>
                    <Col>Home Page</Col>
                </Row>
            </Container>
        </Wrapper>
    );
};

const Wrapper = styled.div`
    padding: 50px;
`;

export default Home;
