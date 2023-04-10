import React from "react";
import { Container, Row, Col } from "react-bootstrap";
import styled from "styled-components";

const Footer = () => {
    return (
        <Wrapper>
            <Container>
                <Row>
                    <Col>
                        <h2>Footer</h2>
                    </Col>
                </Row>
            </Container>
        </Wrapper>
    );
};

const Wrapper = styled.footer`
    padding: 50px;
    background-color: var(--clr-dark);
    color: var(--clr-light);
`;

export default Footer;
